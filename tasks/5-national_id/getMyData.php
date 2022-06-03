<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    die("METHOD NOT ALLOWED 405");
}
session_start();
if ($_POST) {
    $nationalId = $_POST['national_id'];
    $response = getMyData($nationalId);
    $_SESSION['response'] = $response;
    header('location:index.php');
    die;
} else {
    // empty input
}
// "regex:/^([2][0-9][1-9]|[3][0-1][1-9]|[3][2][0-2])([0][1-9]|[1][0-2])([0-2][1-9]|[3][0-1])(01|02|03|04|11|12|13|14|15|16|17|18|19|21|22|23|24|25|26|27|28|29|31|32|33|34|35|88)[0-9]{5}$/"
function getMyData(int $nationalId): array
{
    //29603050100258
    $availableCenturies = [2, 3];
    $availableGovs = [
        'القاهرة' => 01,
        'الإسكندرية' => 02,
        'بورسعيد' => 03,
        'السويس' => 04,
        'دمياط' => 11,
        'الدقهلية' => 12,
        'الشرقية' => 13,
        'القليوبية' => 14,
        'كفر الشيخ' => 15,
        'الغربية' => 16,
        'المنوفية' => 17,
        'البحيرة' => 18,
        'الإسماعيلية' => 19,
        'الجيزة' => 21,
        'بني سويف' => 22,
        'الفيوم' => 23,
        'المنيا' => 24,
        'أسيوط' => 25,
        'سوهاج' => 26,
        'قنا' => 27,
        'أسوان' => 28,
        'الأقصر' => 29,
        'البحر الأحمر' => 31,
        'الوادي الجديد' => 32,
        'مطروح' => 33,
        'شمال سيناء' => 34,
        'جنوب سيناء' => 35,
        'خارج الجمهورية' => 88
    ];
    $response = [];
    if (strlen($nationalId) == 14) {
        $century = substr($nationalId, 0, 1);
        $year = substr($nationalId, 1, 2);
        $month = substr($nationalId, 3, 2);
        $day = substr($nationalId, 5, 2);
        $gov = substr($nationalId, 7, 2);
        $gender = substr($nationalId, 12, 1);
        if (in_array($century, $availableCenturies)) {
            if ($city = array_search($gov, $availableGovs)) {
                $year += (($century * 100) + 1700);
                $birthdate = "{$year}-{$month}-{$day}";
                if(validateDate($birthdate)){
                    $response['success']['birthdate'] = $birthdate;
                    $response['success']['city'] = $city;
                    $response['success']['gender'] = $gender % 2 == 0 ? 'انثى' : 'ذكر';
                } else {
                    $response['error'][0] = "Invalid national id";
                }
               
            } else {
                $response['error'][0] = "Invalid national id";
            }
        } else {
            $response['error'][0] = "Invalid national id";
        }
    } else {
        $response['error'][0] = "the national id should be 14 digits";
    }
    return $response;
}

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}