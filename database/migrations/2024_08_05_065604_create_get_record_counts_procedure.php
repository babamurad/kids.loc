<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE PROCEDURE GetRecordCounts()
            BEGIN
                SELECT
                    'categories' AS tablename,
                    COUNT(*) AS record_count
                  FROM categories
                  UNION ALL
                  SELECT
                    'lessons' AS lessons,
                    COUNT(*) AS record_count
                  FROM lessons
                  UNION ALL
                  SELECT
                    'articles' AS articles,
                    COUNT(*) AS record_count
                  FROM articles
                  UNION ALL
                  SELECT
                    'teachers' AS teachers,
                    COUNT(*) AS record_count
                  FROM teachers;
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetRecordCounts');
    }
};
