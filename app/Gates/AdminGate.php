<?php
namespace App\Gates;
class AdminGate{
public function check_admin($user){
  return $user->name === 'charm';

}
}