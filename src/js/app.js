import axios from 'axios'
import htmlparser from 'htmlparser2'
import cheerio from 'cheerio'

const elmKAccount = document.querySelector('#kayanohime_github_account')
const elmKurl = document.querySelector('#kayanohime_pluginurl')
const axiosApi = axios.create({
    xsrfHeaderName: 'X-CSRF-Token',
    withCredentials: true,
    timeout: 10000
})
const apiUrl = `${elmKurl.getAttribute('data-pluginurl')}/kayanohime/dist/noduchi.php`
Promise.all([
    axiosApi.get(`${apiUrl}?user=${elmKAccount.getAttribute('data-username')}`)
]).then(([result]) => {
    if(result.status >= 400) {
        resolve(new Error())
    }
    else {
        const dom = htmlparser.parseDOM(result.data)
        const ch = cheerio.load(dom)
        let grassfield = document.getElementById('kayanohime_grass')
        grassfield.setAttribute('class', 'kayanohime_grass show')
        grassfield.innerHTML = ch('div.js-calendar-graph.graph-canvas').html()
    }
}).catch(() => { //エラー
    resolve(new Error())
})