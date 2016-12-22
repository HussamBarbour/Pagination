<?php

//Hussam Barbour

class Pagination {
	public $totalNumber;
	public $limit;
	public $page;
	public $pageName;
	public function __construct($total=0,$inpage=10,$pageName='',$urlParamName){
		if ($urlParamName > 1) {
			$this->page = $urlParamName;
			$this->limit = ($this->page * $inpage) - $inpage;
		}
		else {
			$this->page = 1;
			$this->limit = 0;
			
		}
		$this->totalNumber = $total;
		$this->pageName = $pageName;
	}
	
	public function paginationButtons(){
		?>
		<nav aria-label="...">
			<ul class="pagination">
				<?php if ($this->page == 1) {	
				?>
				<li class="disabled">
					<span aria-hidden="true">&laquo;</span>
				</li>
				<?php
				} else {?>
				<li>
					<a href="<?=$this->pageName.($this->page - 1)?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
				</li>
			<?php
				}
			for ($i=1;$i<=$this->totalNumber;$i++)
			{
				?>
				<li <?php if ($this->page == $i) echo 'class="active"';?>><a href="<?=$this->pageName.$i?>"><?=$i?> <span class="sr-only">(current)</span></a></li>
				<?php
			}
			if ($this->page == $this->totalNumber) {
			?>
			<li class="disabled">
				<span aria-hidden="true">&raquo;</span>
			</li>	
			<?php
			} else {
			?>
			<li>
			  <a href="<?=$this->pageName.($this->page + 1)?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			  </a>
			</li>
			<?php
			}
			?>
			
		  </ul>
		</nav>
		<?php
	}
}

?>
