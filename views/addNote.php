<?php 
$listType = $data['nameType'];
?>
<div class="content" style="margin-top:30px">
	<div class="addNote">
		<h2>THÊM MỚI GHI CHÚ</h2>
		<form action="#" method="POST" accept-charset="utf-8" class="form-add">
			Thể loai:
			<select name="type" class="dropdown-select">
				<option value="">Chọn thể loại...</option>
				<?php 
				for ($i=0; $i < count($listType); $i++) { 
					foreach ($listType[$i] as $key => $value) { ?>
					<option value="<?=$value?>"><?=$value?></option>
					<?php } } ?>
				</select>
				Tiêu đề:
				<input type="text" name="title" value="" placeholder="Điền vào tiêu đề">
				Nội dung:
				<textarea rows="6" cols="20" name="content"></textarea>
				<div class="button">
					<button type="button" class="btn-huy">HỦY</button>
					<button type="submit" class="btn-luu">LƯU</button>
				</div>

			</form>
		</div>
	</div>
