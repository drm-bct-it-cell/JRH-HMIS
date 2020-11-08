<?php

namespace App\Http\Controllers;

use App\doctor;
use App\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpdController extends Controller
{
    public function index(Request $request)
    {
        $query = patient::where('date', date("Y-m-d", strtotime($request->date)))->where('umid', $request->umid)->get();
        if (count($query) >= 3) {
            return response()->json(['msg' => 'over']);
        } else {
            $opd = $request->opd;

            for ($i = 0; $i < count($opd); $i++) {
                $timing = doctor::select('timing')->where('Department',$opd[$i])->first();
                $create = patient::create([
                    'date' => $request->date,
                    'umid' => $request->umid,
                    'pf_ppo' => $request->pf_ppo,
                    'name' => $request->name,
                    'mobile'=> $request->mobile,
                    'appoint_for' => $request->appoint_for,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'opd' => $opd[$i],
                    'timing' => $timing->timing,
                ]);
                $total_data[$i] = $create;
            }
            if ($create)
                return response()->json([
                    'msg' => 'success',
                    'pdata' => $total_data ,
                    ]);
            else
                return response()->json(['msg' => 'error']);
        }
    }

    public function getPatient()
    {
        return patient::all();
    }

    public function getDoctorData(Request $request)
    {
        $date = $request->currentDate;
        $opd_count = 0;
        switch ($request->day) {
            case "Monday":
                if ($request->lengthOpd == 1) {
                    $doc_data =   doctor::where('Department', $request->opd[0])->where('Monday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 2) {
                    $doc_data =   doctor::where('Department', $request->opd[1])->where('Monday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 3) {
                    $doc_data =   doctor::where('Department', $request->opd[2])->where('Monday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[2])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } else
                    return response()->json([
                        'doc_data'  => [],
                        'slot_count' => 0,
                        'empty' => true
                    ]);
                break;
            case "Tuesday":
                if ($request->lengthOpd == 1) {
                    $doc_data =   doctor::where('Department', $request->opd[0])->where('Tuesday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 2) {
                    $doc_data =   doctor::where('Department', $request->opd[1])->where('Tuesday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[1])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 3) {
                    $doc_data =   doctor::where('Department', $request->opd[2])->where('Tuesday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[2])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } else
                    return response()->json([
                        'doc_data'  => [],
                        'slot_count' => 0,
                        'empty' => true,
                    ]);
                break;
            case "Wednesday":
                if ($request->lengthOpd == 1) {
                    $doc_data =   doctor::where('Department', $request->opd[0])->where('Wednesday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 2) {
                    $doc_data =   doctor::where('Department', $request->opd[1])->where('Wednesday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[1])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 3) {
                    $doc_data =   doctor::where('Department', $request->opd[2])->where('Wednesday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[2])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } else
                    return response()->json([
                        'doc_data'  => [],
                        'slot_count' => 0,
                        'empty' => true,
                    ]);
                break;
            case "Thursday":
                if ($request->lengthOpd == 1) {
                    $doc_data =   doctor::where('Department', $request->opd[0])->where('Thursday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 2) {
                    $doc_data =   doctor::where('Department', $request->opd[1])->where('Thursday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[1])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 3) {
                    $doc_data =   doctor::where('Department', $request->opd[2])->where('Thursday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[2])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } else
                    return response()->json([
                        'doc_data'  => [],
                        'slot_count' => 0,
                        'empty' => true,
                    ]);
                break;
            case "Friday":
                if ($request->lengthOpd == 1) {
                    $doc_data =   doctor::where('Department', $request->opd[0])->where('Friday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 2) {
                    $doc_data =   doctor::where('Department', $request->opd[1])->where('Friday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[1])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 3) {
                    $doc_data =   doctor::where('Department', $request->opd[2])->where('Friday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[2])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } else
                    return response()->json([
                        'doc_data'  => [],
                        'slot_count' => 0,
                        'empty' => true,
                    ]);
                break;
            case "Saturday":
                if ($request->lengthOpd == 1) {
                    $doc_data =   doctor::where('Department', $request->opd[0])->where('Saturday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 2) {
                    $doc_data =   doctor::where('Department', $request->opd[1])->where('Saturday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[1])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 3) {
                    $doc_data =   doctor::where('Department', $request->opd[2])->where('Saturday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[2])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } else
                    return response()->json([
                        'doc_data'  => [],
                        'slot_count' => 0,
                        'empty' => true,
                    ]);
                break;
            case "Sunday":
                if ($request->lengthOpd == 1) {
                    $doc_data =   doctor::where('Department', $request->opd[0])->where('Sunday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[0])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 2) {
                    $doc_data =   doctor::where('Department', $request->opd[1])->where('Sunday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[1])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } elseif ($request->lengthOpd == 3) {
                    $doc_data =   doctor::where('Department', $request->opd[2])->where('Sunday', 'Yes')->get();
                    $slot_count = patient::where('opd', $request->opd[2])->where('date', $date)->get();
                    foreach ($doc_data as $d) {
                        $opd_count  = $opd_count + $d->count;
                    }
                    return response()->json([
                        'doc_data'  => $doc_data,
                        'slot_count' => count($slot_count),
                        'max_slots' => $opd_count,
                    ]);
                } else
                    return response()->json([
                        'doc_data'  => [],
                        'slot_count' => 0,
                        'empty' => true,
                    ]);
                break;

            default:
                return 0;
        }
    }

    public function getEmployeeData(Request $request)
    {
        $data = DB::table('ipas_master_group')->where('EMPNO', $request->pfNo)->first();
        if ($data) {
            return response()->json([
                'success'  => true,
                'employeeData' => $data,
            ]);
        } else {
            return response()->json([
                'success'  => false,
                'employeeData' => $data,
            ]);
        }
    }
    public function availabeOPDonDay(Request $request)
    {
        if ($request->day == 'Sunday') {
            return response()->json([
                'success'  => false,
                'opdAvailableData' => 'Sunday',
            ]);
        } else {
            $data = doctor::select('Department')->distinct()->where($request->day, 'Yes')->get();
            return response()->json([
                'success'  => true,
                'opdAvailableData' => $data,
            ]);
        }
    }
    public function afterRegister(Request $request){
        return date('Y-m-d',strtotime("tomorrow"));
    }
}
