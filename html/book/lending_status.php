
			<?php
			require_once ($_SERVER["DOCUMENT_ROOT"]."/../includes/mylib_bookies.php");
				if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				$book = $_GET['book'];
				echo $book;
				die('');
				}
				// $lend_list = array();	
					// for($i=0; $i < count($lending); $i++){
						// $book  = get_book_info($lending[$i]);
						// $lend_list[] = $book;
						// for($i=0; $i<count($lend_list); $i++){
						// $total_fee += $lend_list[$i]['fee'];
						// printf("<tr><td>%d</td><td>%s</td><td>%d원</td></tr>",  $i+1, $lend_list[$i]['title'], $lend_list[$i]['fee']);
						// die('');
						// }
					// }
				// $lending_book = title
				// $book_id = book_id
				// $mem_id = mem_id
				// $lend_date = today
				// $due_date =today+rantal_days
				// $return_status = lend_date - today < 0 = "대여중"/lend_date - today > 0  = "연체중"
				// $return_date = '반납진행시 활성화'
				// $penalty = "연체중상태 이후 활성화"($return_date - $lend_date) * fee
				// }
			
			?>	
