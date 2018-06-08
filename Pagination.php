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
		$this->totalNumber = ceil($total/$inpage);
		$this->pageName = $pageName;
	}
	
	public function paginationButtons(){
		?>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<?php if ($this->page == 1) {	
				?>
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1"><span aria-hidden="true">&laquo;</span></a>
				</li>
				<?php
				} else {?>
				<li class="page-item" >
					<a class="page-link" href="<?=$this->pageName.($this->page - 1)?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
				</li>
			<?php
				}
			for ($i=1;$i<=$this->totalNumber;$i++)
			{
				if ($i < ($this->page - 2)) continue;
				if ($i > ($this->page + 2) || $i == $this->totalNumber) break;
				?>
				<li class="page-item <?php if ($this->page == $i) echo 'active';?>" ><a class="page-link"  href="<?=$this->pageName.$i?>"><?=$i?> <span class="sr-only">(current)</span></a></li>
				<?php
			}
			if ($this->page == $this->totalNumber) {
			?>
				<li class="page-item active" ><a class="page-link"  href="<?=$this->pageName.$this->totalNumber?>"><?=$this->totalNumber?> <span class="sr-only">(current)</span></a></li>
			<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1"><span aria-hidden="true">&raquo;</span></a>
				</li>
			<?php
			} else {
			?>
				<li class="page-item" ><a class="page-link"  href="<?=$this->pageName.$this->totalNumber?>"><?=$this->totalNumber?> <span class="sr-only">(current)</span></a></li>

			<li class="page-item">
			  <a class="page-link" href="<?=$this->pageName.($this->page + 1)?>" aria-label="Next">
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
