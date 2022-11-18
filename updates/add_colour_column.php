<?php namespace Bedard\BlogTags\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use Bedard\BlogTags\Models\Tag;
use System\Classes\PluginManager;

class AddColourColumn extends Migration
{
    public function up()
    {
        if(!PluginManager::instance()->hasPlugin('RainLab.Blog'))
        {
            return;
        }

        Schema::table('bedard_blogtags_tags', function($table)
        {
            $table->string('colour')->after('slug')->nullable();
        });
    }

    public function down()
    {
        if(!PluginManager::instance()->hasPlugin('RainLab.Blog'))
        {
            return;
        }

        Schema::table('bedard_blogtags_tags', function($table)
        {
            $table->dropColumn('colour');
        });
    }
}
