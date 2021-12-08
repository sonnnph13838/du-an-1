<div class="mgt-dn lefa mg-fter">
    <form action="bill" method="post">
        <div class="radiogroups">
            <h2>Chi tiết đơn hàng</h2>
            <div class="form-ct">
                <table class="table" style=" width: 90%;line-height: 1.5;font-size: 15px;">
                    <thead>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Hình</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                    </thead>
                    <tbody>
                        <?php
                        $tong = 0;
                        ?>
                        <?php foreach ($listCthd as $index => $c) :  ?>
                            <tr>
                                <td><?= $index + 1 ?> </td>
                                <td><?= $c['name'] ?></td>
                                <td>
                                    <?php $img = UPLOAD_IMAGE . $c['image']  ?>
                                    <img src="<?= $img ?>" alt="" width="100">
                                </td>
                                <td><?= number_format($c['price'], 0, ',', '.') ?> VNĐ</td>
                                <td>
                                    <span class="sl"><?= $c['quantity'] ?></span>
                                </td>
                                <td>
                                    <?= number_format($c['price'] * $c['quantity'], 0, ',', '.') ?>
                                    VNĐ
                                </td>
                                <?php $tong += $c['price'] * $c['quantity']; ?>
                            </tr>
                        <?php endforeach ?>
                        <?php foreach ($listOption as $index => $p) :  ?>
                            <tr>
                                <td>Thêm</td>
                                <td><?= $p['name'] ?></td>
                                <td>
                                    <?php $img = UPLOAD_IMAGE . $p['image']  ?>
                                    <img src="<?= $img ?>" alt="" width="100">
                                </td>
                                <td><?= number_format($p['price'], 0, ',', '.') ?> VNĐ</td>
                                <td>
                                    <span class="sl"><?= $p['quantity'] ?></span>
                                </td>
                                <td>
                                    <?= number_format($p['price'] * $p['quantity'], 0, ',', '.') ?>
                                    VNĐ
                                </td>
                                <?php $tong += $p['price'] * $p['quantity']; ?>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="4" class="total"> <b>Tổng giá trị đơn hàng:<b> </td>
                            <td></td>
                            <td style="color: red;"> <b> <?= number_format($tong, 0, ',', '.') ?> VND </b></td>
                            <input type="hidden" name="tong" value="<?= $tong ?>">
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</div>

</form>
</div>