<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
            <li><a href="contact.html">Trang chủ</a>
            <?php 
                $menu_level_1 = DB::table('cates')->where('parent_id',0)->get();
             ?>
             @foreach($menu_level_1 as $item_1)
            <li><a href="{{ url('loai-san-pham',[$item_1->id,$item_1->name]) }}">{{ $item_1->name }}</a>
                <div>
                    <ul>
                        <?php 
                            $menu_level_2 = DB::table('cates')->where('parent_id',$item_1->id)->get();
                        ?>
                         @foreach( $menu_level_2 as $item_2)
                        <li><a href="{{ url('loai-san-pham',[$item_2->id,$item_2->name]) }}">{{ $item_2->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endforeach
            <li><a href="contact.html">Contact</a>
            </li>
        </ul>
    </nav>
</div>
