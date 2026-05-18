public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->integer('publish_year')->change();
    });
}