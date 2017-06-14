<?php 
$listNote = $data['listNote'];
$listNoteType = $data['listNoteType'];
$detailNote = $data['detailNote'];
?>
<div style="display: flex; margin: 2em;">
	<form action="#" method="POST" accept-charset="utf-8" style="margin-left: 3em;">
		<select name="notetype" class="dropdown-select">
			<option value="All" name>Tất Cả</option>
			<option value="1">Cá Nhân</option>
			<option value="2">Công Việc</option>
		</select>
		<button type="submit" class="btn btn-default">Tìm</button>
	</form>

	<form action="#" method="POST" accept-charset="utf-8" style="margin-left: 3em;">
		Tìm kiếm theo tiêu đề:
		<input type="text" name="searchTitle" value="">
		<button type="submit" class="btn btn-default">Tìm</button>
	</form>
</div>


<table class="table" style="width: 70%">
	<thead class="thead-inverse">
		<tr>
			<th>STT</th>
			<th>TITLE</th>
			<th>CONTENT</th>
			<th>TYPE</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if (!empty($listNote)) {
			for ($i=0; $i < count($listNote); $i++) { ?>
			<tr>
				<th scope="row"><?=$i+1?></th>
				<td><?=$listNote[$i]->NoteTitle?></td>
				<td><?=$listNote[$i]->NoteContent?></td>
				<td><?=$listNote[$i]->NoteType?></td>
				<td>
					<form action="#" method="POST" accept-charset="utf-8">
						<input type="hidden" name="action" value="deleteNote">
						<input type="hidden" name="noteIdDelete" value="<?=$listNote[$i]->NoteId?>">
						<button type="submit" class="btn btn-default" value="delete" style="color: red;">DELETE</button>
					</form>
				</td>
				<td>
					<form action="#" method="POST" accept-charset="utf-8">
						<input type="hidden" name="action" value="viewNote">
						<input type="hidden" name="noteIdView" value="<?=$listNote[$i]->NoteId?>">
						<button type="submit" class="btn btn-default btn-edit">VIEW</button>
					</form>
				</td>
				<?php } ?>
			</tr>
			<?php 
		} else if (!empty($listNoteType)) {
			for ($i=0; $i < count($listNoteType); $i++) {
				?>
				<tr>
					<th scope="row"><?=$i+1?></th>
					<td><?=$listNoteType[$i]->NoteTitle?></td>
					<td><?=$listNoteType[$i]->NoteContent?></td>
					<td><?=$listNoteType[$i]->NoteType?></td>
				</tr>
				<?php 
			}
		}
		?>
	</tbody>
</table>
<div class="content" id="detail">
	<div class="addNote">
		<h2>GHI CHÚ</h2>
		<form action="#" method="POST" accept-charset="utf-8">
			<?php foreach ($detailNote as $key => $value): ?>
				TIÊU ĐỀ:
				<input type="" name="titleEdit" value="<?=$value->title?>" style="width: 335px; font-weight: bold; font-size: 20px">
				NỘI DUNG:
				<textarea rows="10" cols="39" name="contentEdit"><?=$value->content?></textarea>
				<input type="hidden" name="action" value="editNote">
				<input type="hidden" name="IdEdit" value="<?=$value->id?>">
				<button type="submit" class="btn btn-default">SỬA</button>
			<?php endforeach ?>
		</form>
	</div>
</div>