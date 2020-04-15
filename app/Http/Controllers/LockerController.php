<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Expense;
use App\Supply;
use App\Customer;

class LockerController extends Controller
{
    public function locker(Request $request){

        $from = date('Y-m-d', strtotime($request->input('from')));
        $to = date('Y-m-d', strtotime($request->input('to')));

        if($request->input('incomeoroutcome') == 'income')
        {
            if($request->input('income') == 'sup')
            {
                $money = DB::table('supply')->select(DB::raw('SUM(paid) as paid'))->whereBetween('supply.created_at', [$from, $to])->first();
                $item = "ايرادات الموردين";

            }elseif($request->input('income') == 'client')
            {
                $money = DB::table('customers')->select(DB::raw('SUM(paid) as paid'))->whereBetween('customers.created_at', [$from, $to])->first();
                $item = "ايرادات العملاء";

            }elseif($request->input('income') == 'sum')
            {
                $money1 = DB::table('supply')->select(DB::raw('SUM(paid) as paid'))->whereBetween('supply.created_at', [$from, $to])->first();

                $money = DB::table('customers')->select(DB::raw('SUM(paid) as paid'))->whereBetween('customers.created_at', [$from, $to])->first();

                $money->paid += $money1->paid;

                $item = "إجمالى الايرادات";
            }

            
        }elseif($request->input('incomeoroutcome') == 'outcome'){

            if($request->input('outcome') == 'maintain')
            {
                $money = DB::table('expenses')->select(DB::raw('SUM(cost) as paid'))->whereBetween('expenses.created_at', [$from, $to])
                ->where('type', '=', 'صيانة')
                ->groupBy('type')
                ->first();
                
                $item = "مصروفات الصيانة";

            }elseif($request->input('outcome') == 'clientExp')
            {
                $money = DB::table('expenses')->select(DB::raw('SUM(cost) as paid'))->whereBetween('expenses.created_at', [$from, $to])
                ->where('type', '=', 'مصروفات عمال')
                ->groupBy('type')
                ->first();
                
                $item = "مصروفات العمال";

            }elseif($request->input('outcome') == 'salaries')
            {
                $money = DB::table('expenses')->select(DB::raw('SUM(cost) as paid'))->whereBetween('expenses.created_at', [$from, $to])
                ->where('type', '=', 'قبض موظفين')
                ->groupBy('type')
                ->first();
                
                $item = "مصروفات قبض الموظفين";

            }elseif($request->input('outcome') == 'sum')
            {
                $money = DB::table('expenses')->select(DB::raw('SUM(cost) as paid'))->whereBetween('expenses.created_at', [$from, $to])
                ->first();
                
                $item = "إجمالى المصروفات";
            }
        }else{
            $item = "لا يوجد بيانات";
        }

        return view('locker.show', compact('money', 'item'));

        $money = DB::table('expenses')
        ->join('attendances', 'employees.id', '=', 'attendances.employees_id')
        ->whereBetween('attendances.created_at', [$from, $to])
        ->select('employees.id', 'employees.name', DB::raw('COUNT(attendances.employees_id) as attend_count'))
        ->groupBy('attendances.employees_id')
        ->get();

    }
}
