<?php	$add = $this->pm->can_add; ?>
<?php $edit = $this->pm->can_edit; ?>
<?php	$delete = $this->pm->can_delete;	?>
<?php   $no = 1; ?>
<?php   $total_qty = 0; ?>
<?php   $total_discount = 0;  ?>
<?php   $total_amount = 0; ?>
<?php   $order_amount = 0; ?>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-5 table-responsive">
		<table class="table table-striped border-1" style="border-collapse:inherit; margin-bottom:0px; min-width:1000px;">
			<thead>
				<tr class="font-size-11">
					<th class="fix-width-40 text-center">#</th>
					<th class="fix-width-150">รหัสสินค้า</th>
					<th class="min-width-250">ชื่อสินค้า</th>
					<th class="fix-width-100 text-right">ราคา</th>
					<th class="fix-width-100 text-center">จำนวน</th>
					<th class="fix-width-100 text-center">ส่วนลด/หน่วย</th>
					<th class="fix-width-150 text-right">มูลค่า</th>
				</tr>
			</thead>
			<tbody id="detail-table">
				<?php if( ! empty($details)) : ?>
					<?php foreach($details as $rs) : ?>
						<?php $discLabel = discountLabel($rs->discount1, $rs->discount2, $rs->discount3); ?>
						<tr class="font-size-11" id="row_<?php echo $rs->id; ?>">
							<td class="middle text-center"><?php echo $no; ?></td>
							<td class="middle"><?php echo $rs->product_code; ?></td>
							<td class="middle"><?php echo $rs->product_name; ?></td>
							<td class="middle text-right"><?php echo number($rs->price, 2); ?></td>
							<td class="middle text-center"><?php echo number($rs->qty); ?></td>
							<td class="middle text-center"><?php echo $discLabel; ?></td>
							<td class="middle text-right"><?php echo number($rs->total_amount, 2); ?></td>
						</tr>
						<?php $total_qty += $rs->qty;	?>
						<?php $total_discount += $rs->discount_amount; ?>
						<?php $order_amount += $rs->qty * $rs->price; ?>
						<?php $total_amount += $rs->total_amount; ?>
						<?php $no++; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="7" class="text-center"><h4>ไม่พบรายการ</h4></td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="divider-hidden"></div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-5">
  <div class="form-horizontal">
    <div class="form-group">
      <label class="col-lg-2 col-md-4 col-sm-4 control-label no-padding-right">Owner</label>
      <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
        <input type="text" class="form-control input-sm" value="<?php echo $order->user; ?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 col-md-4 col-sm-4 col-xs-12 control-label no-padding-right">Remark</label>
      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <textarea id="remark" maxlength="254" rows="3" class="form-control" onchange="updateRemark()" readonly><?php echo str_replace('"', '&quot;',$order->remark); ?></textarea>
      </div>
    </div>

  </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-5">
  <div class="form-horizontal">
    <div class="form-group">
      <label class="col-lg-3 col-md-3 col-sm-3 col-xs-6 control-label no-padding-right">จำนวน</label>
      <div class="col-lg-2-harf col-md-2-harf col-sm-2-harf col-xs-6 padding-5">
        <input type="text" class="form-control input-sm text-right" id="total-qty" value="<?php echo number($total_qty); ?>" readonly>
      </div>
      <label class="col-lg-2-harf col-md-2-harf col-sm-2-harf col-xs-6 control-label no-padding-right">มูลค่ารวม</label>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 padding-5">
        <input type="text" class="form-control input-sm text-right" id="total-order" value="<?php echo number($order_amount, 2); ?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-8 col-md-8 col-sm-8 col-xs-6 control-label no-padding-right">ส่วนลดรวม</label>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 padding-5">
        <input type="text" class="form-control input-sm text-right" id="total-disc" value="<?php echo number($total_discount, 2); ?>" readonly />
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-8 col-md-8 col-sm-8 col-xs-6 control-label no-padding-right">รวมทั้งสิ้น</label>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 padding-5">
        <input type="text" class="form-control input-sm text-right" id="net-amount" value="<?php echo number($total_amount, 2); ?>" readonly/>
      </div>
    </div>
  </div> <!-- form horizontal -->
</div>
