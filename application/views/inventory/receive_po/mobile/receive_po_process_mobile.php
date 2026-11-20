<?php $this->load->view('include/header_mobile'); ?>
<?php $this->load->view('inventory/receive_po/mobile/style'); ?>
<?php $this->load->view('inventory/receive_po/mobile/process_style'); ?>
<?php $this->load->view('inventory/receive_po/mobile/header_mobile'); ?>
<?php $this->load->view('inventory/receive_po/mobile/process_mobile'); ?>
<?php $this->load->view('inventory/receive_po/mobile/process_menu'); ?>

<script src="<?php echo base_url(); ?>scripts/inventory/receive_po/receive_po_mobile.js?v=<?php echo date('Ymd'); ?>"></script>

<?php $this->load->view('include/footer_mobile'); ?>
