<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appforms', function (Blueprint $table) {
            $table->increments('appform_id');
            $table->string('sales_activity');
            $table->string('user_id');
            $table->string('application_type');
            $table->string('existing_service');
            $table->string('streamyx_tel_no');
            $table->string('streamyx_package');
            $table->string('applicant_name');
            $table->string('ic_passport_num');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->date('passport_exp_date');
            $table->string('inst_address');
            $table->string('contact_num');
            $table->string('email_address');
            $table->string('remark');
            $table->string('thumbprint_coll');
            $table->string('company_name');
            $table->string('buss_reg_num');
            $table->string('docs_uploaded');
            $table->string('eform_id');
            $table->string('ic');
            $table->string('passport');
            $table->string('runner_name');
            $table->string('process_status');
            $table->string('job_status');
            $table->string('admin_remark');
            $table->string('finalstatus');
            $table->string('agenteformstatus');
            $table->string('admineformstatus');
            $table->string('runnereformstatus');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appforms');
    }
}
