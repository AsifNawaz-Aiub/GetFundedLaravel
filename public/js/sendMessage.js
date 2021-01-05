$(document).ready(function () {
  $("#sendButton").click(function () {
    var msg = $("#messageText").val();
    var receiverId = $("#receiverId").val();
    var csrf = $("#csrf").val();
    console.log(msg+receiverId);
    
    sendMessage(msg, receiverId, csrf);
  });
});

function sendMessage(msg, receiverId, csrf){
    $.ajax({
        url: '/admin/messages/send',
        method: 'post',
        datatype : 'json',
        data : {
            'msg':msg,
            'receiverId': receiverId,
            '_token': csrf
        },
        success:function(response){
            if (response.status === 'success'){
                console.log("message sent");
                location.reload(true);
            }
            else{
                console.log("message not sent");
            }
        }
    })
}