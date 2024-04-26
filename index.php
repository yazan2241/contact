<?php
include_once './components/header.php';
include './utils/urls.php';
?>

<?php

$json_file = file_get_contents($GLOBALS['data_path']);
$json_data = json_decode($json_file, true);

if (isset($_GET['e'])) {
    if(isset($_GET['s'])){
    $error = $_GET['s'];
    $msg = $_GET['e'];
    }else {
        $msg = 'Please reload the page';
    }
}

?>
<?php
if (isset($_GET['e'])) {
?>
    <div class="w-full flex justify-end">
        <div class="w-[80%] sm:w-[40%] md:w-[30%] m-3 p-3 rounded flex  <?php if ($error == 1) { ?>bg-[#f0fdf4] text-[#15803d] <?php } else { ?> bg-[#fef2f2] text-[#b91c1c] <?php } ?>">
            <?php echo $msg; ?>
        </div>
    </div>
<?php } ?>

<div class="w-full h-full flex justify-center p-4">
    <div class="flex flex-col gap-4 mt-5 w-full sm:w-1/2 md:w-1/3">
        <p class="font-bold text-lg">Contact List</p>
        <form action="./backend/addContact.php" method="post" class="flex gap-2 w-full">
            <input required type="text" name="name" placeholder="User name" class="w-full h-[40px] border-[1px] border-[#999] p-2 rounded" />
            <input required type="text" name="phone" placeholder="Phone number" class="w-full h-[40px] border-[1px] border-[#999] p-2 rounded" />
            <div class="flex items-center justify-center">
                <input type="submit" name="submit" value="Add" class="px-4 py-2 text-white bg-[#1919e6] font-bold rounded" />
            </div>
        </form>

        <div class="flex flex-col gap-2">
            <?php foreach ($json_data as $user) { ?>
                <div class="flex items-center justify-between">
                    <span class="font-bold"><?php echo $user['name'] ?></span>
                    <span><?php echo $user['phone'] ?></span>
                    <form action="./backend/deleteContact.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
                        <input type="submit" name="submit" value="x" class="bg-[#d32752] text-white font-bold rounded py-1 px-3" />
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include_once './components/footer.php' ?>