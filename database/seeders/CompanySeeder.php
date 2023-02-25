<?php

namespace Database\Seeders;

use App\Models\company\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();

        $company->company_name = "RQ-Soft";
        $company->logo = "N/A";
        $company->banner = "N/A";
        $company->contact_no_1 = "123456789";
        $company->contact_no_2 = "987654321";
        $company->email = "rq@gmail.com";

        $company->address_1 = "Banani";
        $company->address_2 = "Gulshan-1";
        $company->fax = "abc-xyz";
        $company->city = "Dhaka City";
        $company->district = "Dhaka";
        $company->division = "Dhaka";
        $company->state = "N/A";
        $company->country = "Bangladesh";

        $company->website = "www.rq-soft.com";
        $company->linkedin = "Linkedin";
        $company->facebook = "Facebook";
        $company->youtube = "Youtube";
        $company->twitter = "Twitter";
        $company->instagram = "Instagram";
        $company->is_active = true;
        $company->others = "Others";

        $company->save();
    }
}
