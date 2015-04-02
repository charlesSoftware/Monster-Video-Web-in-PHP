<?php if (!defined('THINK_PATH')) exit();?><?php if(!empty($list_comment)): ?><ul class="commentdetail commentdetail_short" id="commentStextBox_update"><?php if(is_array($list_comment)): $i = 0; $__LIST__ = $list_comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): ++$i;$mod = ($i % 2 )?><li><div class="commentdetail_div">
        <p class="commentdetail_txt"><span><?php echo ($comment["floor"]); ?>楼</span> <?php echo (remove_xss(htmlspecialchars($comment["content"]))); ?></p>
        <div class="commentdetail_bar">
        <p><?php echo (date('Y-m-d H:i:s',$comment["addtime"])); ?> 来自:<?php echo (GetIpAddress($comment["ip"])); ?></p>
        <div class="c_more">
			<a class="cup" onclick="cup(<?php echo ($comment["id"]); ?>)" id="cup<?php echo ($comment["id"]); ?>">顶[<?php echo ($comment["up"]); ?>]</a> <a class="cdown" onclick="cdown(<?php echo ($comment["id"]); ?>)"  id="cdown<?php echo ($comment["id"]); ?>">踩[<?php echo ($comment["down"]); ?>]</a>
		</div>
        </div>
    </div></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <?php if($count > C('user_page_cm')): ?><div class="pages"><?php echo ($pages); ?></div><?php endif; ?><?php endif; ?>
<!--发表评论表单 -->