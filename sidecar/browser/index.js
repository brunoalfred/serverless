const chromium = require('chrome-aws-lambda');

/* * Initialization
 * Invoced once and 
 * State is preserved between invocation
 * So we can do the expensive operation here, Once !
 */

 let page;

 async function getPage(){
    if(page){
      return page;
    }

 let  browser = await chromium.puppeteer.launch({
      args: chromium.args,
      defaultViewport: chromium.defaultViewport,
      executablePath: await chromium.executablePath,
      headless: chromium.headless,
      ignoreHTTPSErrors: true,
    });

 let page = await browser.newPage();

 return page;

}



// Original Code: https://github.com/alixaxel/chrome-aws-lambda
exports.handler = async (event) => {

  /** NOTE: this code is executed on every request(invocation)
   * 
   *  Do Less expensive operation here(on every request)
   * 
   */

  let page = await getPage();

  await page.goto(event.url || 'https://laravel.com');

  return await page.title();
  
};