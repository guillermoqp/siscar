<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <a href="<?php print(base_url()) ?>"><h2><i class="fa fa-home"></i> Inicio</h2></a>
        <ol class="breadcrumb">
        <?php if($this->uri->segment(1)!=null) { ?>
            <li>
                <a href="<?php print(base_url($this->uri->segment(1))) ?>" class="tip-bottom">
                <?php print(ucfirst($this->uri->segment(1))) ?>
                </a>
            </li>
            <?php if($this->uri->segment(2)!=null) { ?>
            <li>
                <a href="<?php print(base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3))) ?>" class="current tip-bottom">
                    <?php print(ucfirst($this->uri->segment(2))) ?>
                </a>
            </li>
            <?php } ?>
        <?php } ?>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button id="limpiar_toast" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalConfigurar"><i class="fa fa-cogs"></i></button>
        </div>
    </div>
</div>