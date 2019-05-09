import axios from 'axios'

const elmSubmit = document.querySelector('#submit')
const elmKAccount = document.querySelector('#kayanohime_github_account')
const elmKurl = document.querySelector('#kayanohime_pluginurl')
const axiosApi = axios.create({
    xsrfHeaderName: 'X-CSRF-Token',
    withCredentials: true,
    timeout: 10000
})
const apiUrl = `${elmKurl.getAttribute('data-pluginurl')}/kayanohime/dist/noduchi.php`
//Githubにoverviewページが存在するかチェック
const testExistPage = () => {
    if(elmKAccount.value.length > 0) {
        Promise.all([
            axiosApi.get(`${apiUrl}?user=${elmKAccount.value}`)
        ]).then(([result]) => {
            if(result.status === 200) {
                elmSubmit.disabled = ''
            }
            else { //エラー
                elmSubmit.disabled = 'true'
            }
        }).catch(() => { //エラー
            elmSubmit.disabled = 'true'
        })
    }
    else {
        elmSubmit.disabled = '' //空文字列の場合は外す
    }
}

//ページ表示時チェック
testExistPage()

//ブラー時チェック
elmKAccount.addEventListener('blur', (event) => {
    testExistPage()
})