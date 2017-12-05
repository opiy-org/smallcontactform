<?php

namespace opiy\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class FaqTables_03 extends Migration
{
    public function up()
    {

        Schema::table('opiy_faq_messages', function($table)
        {
            $table->boolean('state')->default(0);
            $table->index('state');

            $table->text('reply')->nullable();
        });

    }

    public function down()
    {
        if (Schema::hasColumn('opiy_faq_messages', 'state')) {

            Schema::table('opiy_faq_messages', function($table)
            {
                $table->dropColumn('state')->nullable();
            });

        }

        if (Schema::hasColumn('opiy_faq_messages', 'reply')) {

            Schema::table('opiy_faq_messages', function($table)
            {
                $table->dropColumn('reply')->nullable();
            });

        }
    }
}
