<?php

namespace opiy\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class FaqTables_01 extends Migration
{
    public function up()
    {

        Schema::create('opiy_faq_messages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('message')->nullable();
            $table->text('form_data')->nullable();
            $table->boolean('new_message')->default(1);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('opiy_faq_messages');
    }
}
