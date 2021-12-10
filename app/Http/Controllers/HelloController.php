<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Consts\prefectures;
class HelloController extends Controller
{
    //
    public function index () 
    {
        
        
        // foreach (prefectures::TOKYO_LIST as $name => $prefecture){
        foreach (prefectures::KANAGAWA_LIST as $name => $prefecture){
        // foreach (prefectures::SAITAMA_LIST as $name => $prefecture){
        // foreach (prefectures::CHIBA_LIST as $name => $prefecture){
    

        $sql = <<< SQL
            SELECT DISTINCT  count(*)'count', '{$name}' AS city
            FROM    dbo.VW_年間管理 INNER JOIN
                    dbo.Mastertbl_Property ON dbo.VW_年間管理.PropertyCD = dbo.Mastertbl_Property.PropertyCD INNER JOIN
                    dbo.Mastertbl_Syain ON dbo.Mastertbl_Property.SYAIN_ID = dbo.Mastertbl_Syain.SYAIN_ID
            WHERE                       (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0047')) AND 
                                        (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0069')) AND
                                        (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0087')) AND
                                        (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0084')) And
                                        (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0121')) AND
                                        (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0024')) AND
                                        (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0168')) AND
                                        (NOT (dbo.Mastertbl_Property.SYAIN_ID = N'A0107')) AND
                                        (dbo.Mastertbl_Property.Address LIKE N'{$prefecture}%{$name}%')
        SQL;
        // dd($sql);
        $data[] = DB::select($sql);
        // $data[] = array_merge($sq,array($name));
        // array_push($data[$i], $name);
        
        // $data = DB::table('tbl_DairyReport')->where('Nippou_CD', '19300930514251')->get();
        
        }
        // dd($data);
        return view('index', compact('data'));
        
    }
}
