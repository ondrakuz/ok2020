<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->updateOrInsert([
            'title' => 'Home',
            'menu_id' => '1',
            'url' => 'home',
            'user_id' => 1,
            'published' => true,
            'description' => 'Site Home page',
            'key_words' => 'home page',
            'perex' => '<p>Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Aenean id metus id velit ullamcorper pulvinar. Praesent dapibus. Integer lacinia. Mauris metus. Integer pellentesque quam vel velit. Aliquam erat volutpat. Duis condimentum augue id magna semper rutrum. Aliquam ornare wisi eu metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>',
            'content' => '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Pellentesque ipsum. Vivamus porttitor turpis ac leo. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Etiam neque. Pellentesque ipsum. Proin mattis lacinia justo. Etiam ligula pede, sagittis quis, interdum ultricies, scelerisque eu. Vestibulum fermentum tortor id mi. Duis pulvinar. Etiam commodo dui eget wisi.</p>
<p>Integer tempor. Integer vulputate sem a nibh rutrum consequat. Aliquam erat volutpat. Suspendisse sagittis ultrices augue. Fusce nibh. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Nam quis nulla. Nullam justo enim, consectetuer nec, ullamcorper ac, vestibulum in, elit. Proin in tellus sit amet nibh dignissim sagittis. Vivamus porttitor turpis ac leo. Duis pulvinar. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas fermentum, sem in pharetra pellentesque, velit turpis volutpat ante, in pharetra metus odio a lectus. Aliquam erat volutpat. Mauris elementum mauris vitae tortor. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
<p>Morbi scelerisque luctus velit. Duis risus. Etiam bibendum elit eget erat. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Quisque porta. Integer lacinia. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Aliquam ante. Nullam rhoncus aliquam metus. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Phasellus faucibus molestie nisl. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Praesent vitae arcu tempor neque lacinia pretium. Nulla quis diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam dictum tincidunt diam. Etiam neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus luctus egestas leo.</p>
<p>Duis sapien nunc, commodo et, interdum suscipit, sollicitudin et, dolor. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Nullam sit amet magna in magna gravida vehicula. Fusce nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque arcu. Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vivamus porttitor turpis ac leo. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Etiam egestas wisi a erat. Integer vulputate sem a nibh rutrum consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. Quisque tincidunt scelerisque libero. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>',
            'priority' => 10,
            'discussion' => false,
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
