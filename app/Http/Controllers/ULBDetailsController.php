<?php

namespace App\Http\Controllers;

use App\Models\ULBDetails;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\StateMaster;
use Illuminate\Support\Facades\DB;


class ULBDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Token::where('tokenid', $request->tokenid)->first();
        $userid = $user['userid'];



        if ($userid) {
            $CustomerCreation = new ULBDetails;
            $CustomerCreation->area = $request->ulbdetails['area'];
            $CustomerCreation->population2011 = $request->ulbdetails['population2011'];
            // $CustomerCreation ->presentpopulation = $request->ulbdetails['presentpopulation'];
            $CustomerCreation->wards = $request->ulbdetails['wards'];
            $CustomerCreation->households = $request->ulbdetails['households'];
            $CustomerCreation->commercial = $request->ulbdetails['commercial'];
            $CustomerCreation->ABbusstand = $request->ulbdetails['ABbusstand'];
            $CustomerCreation->CDbusstand = $request->ulbdetails['CDbusstand'];
            $CustomerCreation->market_morethan_oneacre = $request->ulbdetails['market_morethan_oneacre'];
            $CustomerCreation->market_lessthan_oneacre = $request->ulbdetails['market_lessthan_oneacre'];
            $CustomerCreation->lengthofroad = $request->ulbdetails['lengthofroad'];
            $CustomerCreation->lengthofrouteroad = $request->ulbdetails['lengthofrouteroad'];
            $CustomerCreation->lengthofotherroad = $request->ulbdetails['lengthofotherroad'];
            $CustomerCreation->lengthoflanes = $request->ulbdetails['lengthoflanes'];
            $CustomerCreation->lengthofpucca = $request->ulbdetails['lengthofpucca'];
            $CustomerCreation->lengthofcutcha = $request->ulbdetails['lengthofcutcha'];
            $CustomerCreation->parks = $request->ulbdetails['parks'];
            $CustomerCreation->parksforpublicuse = $request->ulbdetails['parksforpublicuse'];
            $CustomerCreation->tricycle = $request->ulbdetails['tricycle'];
            $CustomerCreation->bov = $request->ulbdetails['bov'];
            $CustomerCreation->bovrepair = $request->ulbdetails['bovrepair'];
            $CustomerCreation->lcv = $request->ulbdetails['lcv'];
            $CustomerCreation->lcvrepair = $request->ulbdetails['lcvrepair'];
            $CustomerCreation->compactor = $request->ulbdetails['compactor'];
            $CustomerCreation->hookloaderwithcapacity = $request->ulbdetails['hookloaderwithcapacity'];
            $CustomerCreation->compactorbin = $request->ulbdetails['compactorbin'];
            $CustomerCreation->hookloader = $request->ulbdetails['hookloader'];
            $CustomerCreation->tractortipper = $request->ulbdetails['tractortipper'];
            $CustomerCreation->lorries = $request->ulbdetails['lorries'];
            $CustomerCreation->jcb = $request->ulbdetails['jcb'];
            $CustomerCreation->bobcat = $request->ulbdetails['bobcat'];
            $CustomerCreation->sanitaryworkers_sanctioned = $request->ulbdetails['sanitaryworkers_sanctioned'];
            $CustomerCreation->sanitaryworkers_inservice = $request->ulbdetails['sanitaryworkers_inservice'];
            $CustomerCreation->sanitarysupervisor_sanctioned = $request->ulbdetails['sanitarysupervisor_sanctioned'];
            $CustomerCreation->sanitarysupervisor_inservice = $request->ulbdetails['sanitarysupervisor_inservice'];
            $CustomerCreation->permanentdrivers = $request->ulbdetails['permanentdrivers'];
            $CustomerCreation->regulardrivers = $request->ulbdetails['regulardrivers'];
            $CustomerCreation->publicgathering = $request->ulbdetails['publicgathering'];
            $CustomerCreation->secondarystorage = $request->ulbdetails['secondarystorage'];
            $CustomerCreation->transferstation = $request->ulbdetails['transferstation'];
            $CustomerCreation->households_animatorsurvey = $request->ulbdetails['households_animatorsurvey'];
            $CustomerCreation->assessments_residential = $request->ulbdetails['assessments_residential'];
            $CustomerCreation->assessments_commercial = $request->ulbdetails['assessments_commercial'];
            $CustomerCreation->cust_creation_mainid = $request->ulbdetails['cust_creation_mainid'];
            $CustomerCreation->createdby_userid = $userid;
            $CustomerCreation->updatedby_userid = 0;
            $CustomerCreation->save();
        }

        if ($CustomerCreation) {
            return response()->json([
                'status' => 200,
                'message' => 'ULB Details Saved!',
                'id' => $CustomerCreation['id'],
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Unable to save!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ULBDetails  $uLBDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $UlbDetails = ULBDetails::where('cust_creation_mainid', $id)->get()->first();
        if ($UlbDetails) {
            return response()->json([
                'status' => 200,
                'ulbdetails' => $UlbDetails,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'No data'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ULBDetails  $uLBDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ULBDetails $uLBDetails)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ULBDetails  $uLBDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = Token::where('tokenid', $request->tokenid)->first();
        $userid = $user['userid'];

        if (!$userid) {
            return response()->json([
                'status' => 400,
                'message' => "Unable to update!"
            ]);
        }

        $ULBDetails = ULBDetails::findOrFail($id)->update([
            'area' => $request->ulbdetails['area'],
            'population2011' => $request->ulbdetails['population2011'],
            // 'presentpopulation' => $request->ulbdetails['presentpopulation'],
            'wards' => $request->ulbdetails['wards'],
            'households' => $request->ulbdetails['households'],
            'commercial' => $request->ulbdetails['commercial'],
            'ABbusstand' => $request->ulbdetails['ABbusstand'],
            'CDbusstand' => $request->ulbdetails['CDbusstand'],
            'market_morethan_oneacre' => $request->ulbdetails['market_morethan_oneacre'],
            'market_lessthan_oneacre' => $request->ulbdetails['market_lessthan_oneacre'],
            'lengthofroad' => $request->ulbdetails['lengthofroad'],
            'lengthofrouteroad' => $request->ulbdetails['lengthofrouteroad'],
            'lengthofotherroad' => $request->ulbdetails['lengthofotherroad'],
            'lengthoflanes' => $request->ulbdetails['lengthoflanes'],
            'lengthofpucca' => $request->ulbdetails['lengthofpucca'],
            'lengthofcutcha' => $request->ulbdetails['lengthofcutcha'],
            'parks' => $request->ulbdetails['parks'],
            'parksforpublicuse' => $request->ulbdetails['parksforpublicuse'],
            'tricycle' => $request->ulbdetails['tricycle'],
            'bov' => $request->ulbdetails['bov'],
            'bovrepair' => $request->ulbdetails['bovrepair'],
            'lcv' => $request->ulbdetails['lcv'],
            'lcvrepair' => $request->ulbdetails['lcvrepair'],
            'compactor' => $request->ulbdetails['compactor'],
            'hookloaderwithcapacity' => $request->ulbdetails['hookloaderwithcapacity'],
            'compactorbin' => $request->ulbdetails['compactorbin'],
            'hookloader' => $request->ulbdetails['hookloader'],
            'tractortipper' => $request->ulbdetails['tractortipper'],
            'lorries' => $request->ulbdetails['lorries'],
            'jcb' => $request->ulbdetails['jcb'],
            'bobcat' => $request->ulbdetails['bobcat'],
            'sanitaryworkers_sanctioned' => $request->ulbdetails['sanitaryworkers_sanctioned'],
            'sanitaryworkers_inservice' => $request->ulbdetails['sanitaryworkers_inservice'],
            'sanitarysupervisor_sanctioned' => $request->ulbdetails['sanitarysupervisor_sanctioned'],
            'sanitarysupervisor_inservice' => $request->ulbdetails['sanitarysupervisor_inservice'],
            'permanentdrivers' => $request->ulbdetails['permanentdrivers'],
            'regulardrivers' => $request->ulbdetails['regulardrivers'],
            'publicgathering' => $request->ulbdetails['publicgathering'],
            'secondarystorage' => $request->ulbdetails['secondarystorage'],
            'transferstation' => $request->ulbdetails['transferstation'],
            'households_animatorsurvey' => $request->ulbdetails['households_animatorsurvey'],
            'assessments_residential' => $request->ulbdetails['assessments_residential'],
            'assessments_commercial' => $request->ulbdetails['assessments_commercial'],
            'cust_creation_mainid' => $request->ulbdetails['cust_creation_mainid'],
            'updatedby_userid' => $userid,
        ]);

        if ($ULBDetails)
            return response()->json([
                'status' => 200,
                'message' => "Updated Successfully!"
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ULBDetails  $uLBDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ULBDetails $uLBDetails)
    {
        //
    }


    //Dashborad contents based on ulbdetails
    public function getulbdashboarddetails()
    {
        $UlbDetails = DB::table('customer_creation_profiles as c')
            ->join("state_masters as s", "s.id", "c.state")
            ->join("u_l_b_details as u", "c.id", "u.cust_creation_mainid")
            ->join("country_masters as co", "s.country_id", "co.id")
            ->where("s.id", "!=", "")
            ->where("s.state_status", "Active")
            ->groupBy('s.id', 's.state_name', 's.category', 's.state_code', 's.country_id', 'co.country_name')
            ->orderBy("s.id", "asc")
            ->select(
                's.id',
                's.state_name',
                's.category',
                's.state_code',
                's.country_id',
                'co.country_name',
                DB::raw('COUNT(c.id) as count'),
                DB::raw('SUM(u.population2011) as population2011')
            )
            ->get();

        //Query for customer count monthwise with year (excluted tender awarded status)
        // $monthwise = DB::table('customer_creation_profiles')
        // ->select(DB::raw('count(id) as `count`'),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
        // ->groupby('year', 'month')
        // ->get();

        $awarded = DB::table('customer_creation_profiles as c')
            ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
            ->join('tender_status_contract_awarded as a', 'a.bidid', 'b.id')
            ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
            ->groupby('year', 'month', 'c.state')
            ->get();

        $participated = DB::table('customer_creation_profiles as c')
            ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
            ->join('bid_creation_tender_participations as p', 'p.bidCreationMainId', 'b.id')
            ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
            ->groupby('year', 'month', 'c.state')
            ->where('p.tenderparticipation', 'participating')
            ->get();

        // $bid_submitted = DB::table('customer_creation_profiles as c')
        //     ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
        //     ->join('bid_creation_bid_submitted_statuses as s', 's.bidCreationMainId', 'b.id')
        //     ->select(DB::raw('count(c.id) as `count`'), DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
        //     ->groupby('year', 'month', 'c.state')
        //     ->get();

        $retender = DB::table('customer_creation_profiles as c')
            ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
            ->join('bid_management_tender_or_bid_stauses as a', 'a.bidid', 'b.id')
            ->where('a.status', 'Retender')
            ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
            ->groupby('year', 'month', 'c.state')
            ->get();

        $cancelled = DB::table('customer_creation_profiles as c')
            ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
            ->join('bid_management_tender_or_bid_stauses as a', 'a.bidid', 'b.id')
            ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
            ->where('a.status', 'Cancel')
            ->groupby('year', 'month', 'c.state')
            ->get();

        if ($UlbDetails)
            return response()->json([
                'status' => 200,
                'list' => $UlbDetails, //statewise response ulb count, population count
                'awarded' => $awarded, //year,month, state wise awarded tenders details
                // 'bid_submitted' => $bid_submitted, //year,month, state wise bid_submitted tenders details
                'participating' => $participated,  //year,month, state wise Partisipating tenders details
                'cancelled' => $cancelled,
                'retender' => $retender

            ]);
        else {
            return response()->json([
                'list' => "No content"
            ], 204);
        }
    }


    //Dashborad contents based on ulbdetails
    public function getbidanalysis()
    {
        try {

            $retender = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->join('bid_management_tender_or_bid_stauses as a', 'a.bidid', 'b.id')
                ->where('a.status', 'Retender')
                ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->groupby('year', 'month', 'c.state')
                ->get();

            $cancelled = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->join('bid_management_tender_or_bid_stauses as a', 'a.bidid', 'b.id')
                ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->where('a.status', 'Cancel')
                ->groupby('year', 'month', 'c.state')
                ->get();

            $awarded = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->join('tender_status_contract_awarded as a', 'a.bidid', 'b.id')
                ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->groupby('year', 'month', 'c.state')
                ->get();

            $in_fin_eval = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->whereIn('b.id', function ($query) {
                    $query->select('bidid')->from('tender_status_tech_evaluations')->groupBy('bidid');
                })
                ->whereNotIn('b.id', function ($query) {
                    $query->select('bidid')->from('tender_status_financial_evaluations')->groupBy('bidid');
                })
                ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->groupby('year', 'month', 'c.state')
                ->get();

            $in_tech_eval = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->whereIn('b.id', function ($query) {
                    $query->select('bidid')->from('tender_status_bidders')->groupBy('bidid');
                })
                ->whereNotIn('b.id', function ($query) {
                    $query->select('bidid')->from('tender_status_tech_evaluations')->groupBy('bidid');
                })
                ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->groupby('year', 'month', 'c.state')
                ->get();


            $to_be_opened = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->join('bid_creation_bid_submitted_statuses as s', 's.bidCreationMainId', 'b.id')
                ->whereNotIn('b.id', function ($query) {
                    $query->select('bidid')->from('tender_status_bidders')->groupBy('bidid');
                })
                ->select(DB::raw('count(c.id) as `count`'),  DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->groupby('year', 'month', 'c.state')
                ->get();

            $bid_submitted = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->join('bid_creation_bid_submitted_statuses as s', 's.bidCreationMainId', 'b.id')
                ->select(DB::raw('count(c.id) as `count`'), DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->groupby('year', 'month', 'c.state')
                ->get();

            $bid_details = DB::table('customer_creation_profiles as c')
                ->join('bid_creation__creations as b', 'b.ulb', 'c.id')
                ->select(DB::raw('count(c.id) as count'), DB::raw('YEAR(c.created_at) year, MONTH(c.created_at) month'), 'c.state')
                ->groupby('year', 'month', 'c.state', 'b.bidno')
                ->get();


            return response()->json([
                'status' => 200,
                'awarded' => $awarded, //year,month, state wise awarded tenders details
                'bid_submitted' => $bid_submitted, //year,month, state wise bid_submitted tenders details
                'to_be_opened' => $to_be_opened,  //year,month, state wise bid_submitted tenders details
                'bid_details' => $bid_details, //Totla bid count year,month, state wise bid_submitted tenders details
                'in_tech_eval' => $in_tech_eval, // Technical Evaluation process is in pending
                'in_fin_eval' => $in_fin_eval,  // Financial Evaluation process is in pending
                'cancelled' => $cancelled, // Cancelled Tenders
                'retender' => $retender, // Retender Tenders 
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 204,
                'message' => "Somthing Wrong",
                'error' => $ex
            ]);
        }
    }

    public function tenderanalysis()
    {
        $tender = DB::table('tender_creations as t')
            ->select('t.organisation', 't.customername', 'c.customer_no', 'c.customer_category', 'c.customer_name', 'c.smart_city', 'c.customer_sub_category', 'c.state',
             (DB::table('bid_creation_bid_submitted_statuses as bs')
             ->select('sb.bidSubmittedStatus','sb.bidCreationMainId')))
            ->join('customer_creation_profiles as c', 'c.id', 't.customername')
            ->join('bid_creation__creations as b','b.tendercreation','t.id')
            ->join('bid_creation_bid_submitted_statuses as bs','b.id','bs.bidCreationMainId')
            ->groupBy('t.state', 'c.organisation', 't.tendertype', 'c.customer_sub_category')
            ->get();

            return $tender;
    }
}
