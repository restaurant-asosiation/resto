<?php

namespace App\Mylibs;
 
class WithHelper {
 
  public function withCheck($data) {
    if ($data) {
      return [
        'withKey' => 'success',
        'withValue' => 'Data Successfully Saved',
      ];
    } else {
      return [
        'withKey' => 'danger',
        'withValue' => 'Data Failed Save',
      ];
    }
  }
 
}
