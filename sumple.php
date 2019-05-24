<?php
class Main {
    function sub() {
        return $this->hasOne('App\Sub')
    }
}
?>
は
select *
from mains
join subs on mains.id = subs.main_id
である。
<?php
class Sub {
    function main() {
        return $this->belongsTo('App\Main')
    }
}
?>
は
select *
from subs
join mains on mains.id = subs.main_id
である。
前者だと
<?php
$main = Main::find($id);
$main->sub;
?>
だし、後者だと
<?php
$sub = Sub::find($id);
$sub->main;
?>
で取れる。この時
<?php
$main->sub == $sub;
$sub->main == $main;
?>
別のオブジェクトとして生成されているためtrueにならないかもしれないが、中身は同じである。
mainのidとsubのmain_idが同じ前提となる
