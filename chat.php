<?php
include 'includes/auth.php';
include 'includes/common-header.php';
include 'config.php';

$currentUser = $_SESSION['user_id'];
$usersRes = $conn->query("SELECT id, name FROM users WHERE id <> {$currentUser}");
$activeUser = isset($_GET['user']) ? (int)$_GET['user'] : 0;
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h4>Users</h4>
                    <ul class="list-unstyled">
                        <?php if ($usersRes && $usersRes->num_rows > 0): ?>
                            <?php while ($u = $usersRes->fetch_assoc()): ?>
                                <li><a href="chat.php?user=<?php echo $u['id']; ?>"><?php echo htmlspecialchars($u['name']); ?></a></li>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <li>No other users found.</li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-8">
                    <?php if ($activeUser): ?>
                        <div id="chat-box" style="height:400px; overflow-y:auto; border:1px solid #ccc; padding:10px;" class="mb-3"></div>
                        <form id="chat-form">
                            <input type="hidden" id="receiver_id" value="<?php echo $activeUser; ?>">
                            <div class="input-group">
                                <input type="text" id="message" class="form-control" placeholder="Type message...">
                                <button class="btn btn-primary" type="submit">Send</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <p>Select a user to start chatting.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function fetchMessages(){
    var receiver = document.getElementById('receiver_id').value;
    fetch('fetch_messages.php?user='+receiver)
        .then(r=>r.text())
        .then(html=>{
            document.getElementById('chat-box').innerHTML = html;
            var box = document.getElementById('chat-box');
            box.scrollTop = box.scrollHeight;
        });
}

document.addEventListener('DOMContentLoaded', ()=>{
    if(document.getElementById('chat-form')){
        fetchMessages();
        setInterval(fetchMessages,3000);
        document.getElementById('chat-form').addEventListener('submit', function(e){
            e.preventDefault();
            var receiver = document.getElementById('receiver_id').value;
            var message = document.getElementById('message').value;
            fetch('send_message.php', {
                method:'POST',
                headers:{'Content-Type':'application/x-www-form-urlencoded'},
                body:'receiver_id='+encodeURIComponent(receiver)+'&message='+encodeURIComponent(message)
            }).then(()=>{
                document.getElementById('message').value='';
                fetchMessages();
            });
        });
    }
});
</script>
<?php include 'includes/common-footer.php'; ?>
