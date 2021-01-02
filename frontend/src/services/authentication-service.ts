export default class Authentication{
    static isAutenticated:boolean=false;

    static login(username:string,password:string):Promise<boolean>{
        const isAutenticated=(username==="Ahmadou" && password==="ahmedkassoum");
        return new Promise(resolve=>{
            setTimeout(()=>{
                this.isAutenticated=isAutenticated;
                resolve(isAutenticated);
            },1000);
        });
    }
}