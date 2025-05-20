let email_all_check = 0;
let id_all_check = 0;
let nick_all_check = 0;
let password_same = 0;

let timer = 60;
let seconds;

let email_check_num = 0;

const emailInput = document.getElementById('user_email');
const timer_bt = document.querySelector('.timer_bt');
const ch_bt = document.querySelector('.ch_bt');
const che_code = document.getElementById('che_codee');
const forr = document.getElementById('forr');
const che_input = document.getElementById('che_code');
const email_all = document.querySelector('.email_all_check');

const show_btn1 = document.querySelector('.show_btn1');
const user_password = document.getElementById('user_password');

function showPassword1() {
    user_password.type = 'text';
}
function hidePassword1() {
    user_password.type = 'password';
}

show_btn1.addEventListener('mousedown', showPassword1);
show_btn1.addEventListener('mouseup', hidePassword1);
show_btn1.addEventListener('mouseleave', hidePassword1);
show_btn1.addEventListener('touchstart', showPassword1);
show_btn1.addEventListener('touchend', hidePassword1);

const show_btn2 = document.querySelector('.show_btn2');
const re_user_password = document.getElementById('re_user_password');

function showPassword2() {
    re_user_password.type = 'text';
}
function hidePassword2() {
    re_user_password.type = 'password';
}

const re_text_box = document.querySelector('.re_text_box');
const re_text_box_text = document.querySelector('.re_text_box_text');
function same() {
    if(re_user_password.value === user_password.value) {
        password_same = 1;
        re_user_password.style.border = '2px solid black';
        re_text_box.style.height = '0';
        re_text_box.style.margin = '0';
        re_text_box_text.textContent = '';
    } else {
        password_same = 0;
        re_user_password.style.border = '2px solid red';
        re_text_box.style.height = '15px';
        re_text_box.style.margin = '0 0 10px 0';
        re_text_box_text.textContent = '비밀번호가 일치하지 않습니다.';
    }
}

user_password.addEventListener('input', ()=>{
    if(re_user_password.value.trim().length >= 1) {
        same();
    }
});
    
re_user_password.addEventListener('input', ()=>{
    same();
});

show_btn2.addEventListener('mousedown', showPassword2);
show_btn2.addEventListener('mouseup', hidePassword2);
show_btn2.addEventListener('mouseleave', hidePassword2);
show_btn2.addEventListener('touchstart', showPassword2);
show_btn2.addEventListener('touchend', hidePassword2);



forr.addEventListener('submit', event=>{
    const user_name = document.getElementById('user_name');
    const user_nickname = document.getElementById('user_nickname');
    const user_id = document.getElementById('user_id');
    const user_password = document.getElementById('user_password');
    const user_email = document.getElementById('user_email');

    const nick_bt = document.querySelector('.nick_bt');
    const id_num = document.querySelector('.id_num');
    const ch_bt = document.querySelector('.ch_bt');

    if(user_name.value.trim().length === 0) {
        alert('이름을 입력해 주세요.');
        user_name.focus();
        event.preventDefault();
    } else if(user_nickname.value.trim().length === 0) {
        alert('닉네임을 입력해 주세요.');
        user_nickname.focus();
        event.preventDefault();
    } else if(nick_all_check !== 1) {
        alert('닉네임 중복 여부를 확인해 주세요')
        nick_bt.focus();
        event.preventDefault();
    } else if(user_id.value.trim().length === 0) {
        alert('아이디를 입력해 주세요.');
        user_id.focus();
        event.preventDefault();
    } else if(id_all_check !== 1) {
        alert('아이디 중복 여부를 확인해 주세요')
        id_num.focus();
        event.preventDefault();
    } else if(user_password.value.trim().length === 0) {
        alert('비밀번호를 입력해 주세요.');
        user_password.focus();
        event.preventDefault();
    } else if(re_user_password.value.trim().length === 0) {
        alert('비밀번호 확인란을 입력해주세요.');
        re_user_password.focus();
        event.preventDefault();
    } else if(password_same !== 1) {
        alert('비밀번호가 일치하지 않습니다.');
        re_user_password.focus();
        event.preventDefault();
    } else if(user_email.value.trim().length === 0) {
        alert('이메일을 입력해 주세요.');
        user_email.focus();
        event.preventDefault();
    } else if(email_all_check !== 1) {
        alert('이메일 인증이 필요합니다.');
        ch_bt.focus();
        event.preventDefault();
    }
})

function timer_sec() {
    timer = 60;
    timer_bt.innerText = timer;
    clearInterval(seconds);

    seconds = setInterval(()=>{
        timer--;
        timer_bt.innerText = timer;

        if(timer === 0) {
            clearInterval(seconds);
            false_email();
        }
    }, 1000);
}

function true_email() {
    timer_sec();   
    forr.style.top = '5%';
    che_code.style.display = 'block';
    emailInput.readOnly = true;
    che_input.focus();
    ch_bt.style.display = 'none';
    timer_bt.style.display = 'block';
}

function false_email() {
    emailInput.focus();
    emailInput.readOnly = false;
    ch_bt.style.display = 'block';
    timer_bt.style.display = 'none';
    che_code.style.display = 'none';
    forr.style.top = '10%';
}

function mail_main() {
    const loading_ani = document.querySelector('.loading_container');
    loading_ani.style.display = 'block';
    fetch('email.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: 'email=' + encodeURIComponent(emailInput.value)
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('메일이 발송되었습니다.');
        loading_ani.style.display = 'none';
        email_check_num = data.code;
        true_email();
      } else {
        alert('존재하지 않는 이메일입니다.')
        false_email();
        loading_ani.style.display = 'none';
      }
    })
    .catch(() => {
        alert('통신 오류 발생');
        loading_ani.style.display = 'none';
      });
}

function email_send() {

    if(emailInput.value !== '' && emailInput.value.includes("@") && emailInput.value.includes(".")) {
        fetch('check_id.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'email=' + encodeURIComponent(emailInput.value)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('이미 사용 중인 이메일입니다.');
                emailInput.focus();
            } else {
                mail_main();
            }
        })
    } else if(!emailInput.value.includes("@") || !emailInput.value.includes(".")) {
        alert('이메일 양식을 확인해 주세요.');
        emailInput.focus();
    } else {
        alert('이메일 양식을 확인해 주세요.');
        emailInput.focus();
    }
}
function email_suc() {
    if(Number(che_input.value) === email_check_num) {
        alert('이메일 인증이 완료되었습니다.');
        email_all_check = 1;
        email_all.style.display = 'block';
        che_code.style.display = 'none';
        timer_bt.style.display = 'none';
    } else if(che_input.value === '') {
        alert('빈칸을 확인해 주세요.');
    } else {
        alert('일치하지 않습니다.');
    }
}

function id_check() {
    const user_id = document.getElementById('user_id');
    const id_num = document.querySelector('.id_num');
    const id_read = document.querySelector('.id_read');
    
    if(user_id.value !== '' && user_id.value.length >= 5) {
        fetch('check_id.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'user_id=' + encodeURIComponent(user_id.value)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('이미 사용 중인 아이디입니다.');
                user_id.focus();
            } else {
                alert('사용 가능한 아이디입니다.');
                id_all_check = 1;
                user_id.readOnly = true;
                id_num.style.display = 'none';
                id_read.style.display = 'block';
            }
        })
    } else if(user_id.value.length < 5) {
        alert('아이디를 5자리 이상 작성해 주세요.');
        user_id.focus();
    } else {
        alert('빈칸을 확인해 주세요.');
        user_id.focus();
    }
}

function nick_chck() {
    const user_nickname = document.getElementById('user_nickname');
    const nick_bt = document.querySelector('.nick_bt');
    const nick_read = document.querySelector('.nick_read');
    if(user_nickname.value !== '' && user_nickname.value.length >= 3) {
        fetch('check_id.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'user_nickname=' + encodeURIComponent(user_nickname.value)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('이미 사용 중인 닉네임입니다.');
                user_nickname.focus();
            } else {
                alert('사용 가능한 닉네임입니다.');
                nick_all_check = 1;
                user_nickname.readOnly = true;
                nick_bt.style.display = 'none';
                nick_read.style.display = 'block';
            }
        })
    } else if(user_nickname.value.length < 3) {
        alert('닉네임을 3자리 이상 작성해 주세요.');
        user_nickname.focus();
    } else {
        alert('빈칸을 확인해 주세요.');       
        user_nickname.focus();
    }
}