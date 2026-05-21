export default class BankAccount {
    #balance = 0;
    constructor(owner){
        this.owner = owner;
    }

    deposit(amount){
        this.#balance += amount;
        console.log('${this.owner}, Menabung Rp.${this.amount}');
    }

    withdraw(amount){
        if (amount > this.#balance){
            console.log("Saldo Tidak Cukup!")
        }
        this.#balance -= amount;
        console.log('${this.owner}, menarik Rp.${this.amount}');
    }
    getBalance(){
        return this.#balance;
    }
}