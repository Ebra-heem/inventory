@php
    $Drtotal=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$chartAccount)->sum('amount');
        $Crtotal=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$chartAccount)->sum('amount');

        //return 'Dr'.$Drtotal.' Cr'.$Crtotal;
        if($Drtotal>=$Crtotal){
            echo $Drtotal-$Crtotal;
        }else{
            echo $Crtotal-$Drtotal;
        }
        
@endphp