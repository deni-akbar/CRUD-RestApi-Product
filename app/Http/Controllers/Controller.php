<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
    /**
     * @OA\Info(
     *     version="1.0.0",
     *     title=" Api Documentation",
     *     description=" Api Documentation",
     *     @OA\Contact(
     *         name="Deni Akbar",
     *         email="dnxdenny@gmail.com"
     *     )
     * )
     */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
