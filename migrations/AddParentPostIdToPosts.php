<?php

namespace Oncdev\NestedReplies\Migrations;

use Flarum\Database\AbstractMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentPostIdToPosts extends AbstractMigration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedInteger('parent_post_id')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('parent_post_id');
        });
    }
}
