<?php 

class reports {
    //  get report
    public function getWalletReports()
    {
        return "Balance : $this->balance in this month";
    }
    //  get Transation
    public function getOldWalletTransactions()
    {
        return "Balance : $this->balance in last month";
    }
}




// function sum_soad_withReturn ($x , $y) {
//     return $x + $y;
// }

// $result =  sum_soad_withReturn(2,3); // 5
// echo $result;
// save into database
// saveToDB($result);