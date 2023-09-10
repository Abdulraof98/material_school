<?php 
use Illuminate\Support\Facades\Auth;


function profile_image(){
    $user = Auth::user();
    if($user->document->address)
    return $user->document->address;
    return false;
}
function getMonthName($date)
{
    return date('F', strtotime($date));
}

function getYearName($date)
{
    return date('Y', strtotime($date));
}
?>