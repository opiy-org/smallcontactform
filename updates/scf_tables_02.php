<?php

namespace opiy\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class FaqTables_02 extends Migration
{
    public function up()
    {

        Schema::table('opiy_faq_messages', function($table)
        {
            $table->string('remote_ip')->nullable();
            $table->index('remote_ip');
        });

    }

    public function down()
    {
        if (Schema::hasColumn('opiy_faq_messages', 'remote_ip')) {

            Schema::table('opiy_faq_messages', function($table)
            {
                $table->dropColumn('remote_ip')->nullable();
            });

        }
    }
}
