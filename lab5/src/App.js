import React, { useState } from "react";
import "./App.css";

function App() {
    const [dollars, setDollars] = useState("");
    const [rupees, setRupees] = useState("");

    const exchangeRate = 82.5; // Hard-coded exchange rate: 1 USD = 82.5 INR

    const handleDollarChange = (e) => {
        const dollarValue = e.target.value;
        setDollars(dollarValue);

        // Calculate and set the rupee equivalent
        if (!isNaN(dollarValue) && dollarValue !== "") {
            setRupees((dollarValue * exchangeRate).toFixed(2));
        } else {
            setRupees("");
        }
    };

    return (
        <div className="app">
            <h1>Currency Converter</h1>
            <div className="converter">
                <label>
                    Amount in Dollars (USD):
                    <input
                        type="text"
                        value={dollars}
                        onChange={handleDollarChange}
                        placeholder="Enter amount in USD"
                    />
                </label>
                <p>
                    Equivalent in Rupees (INR): <strong>{rupees}</strong>
                </p>
            </div>
        </div>
    );
}

export default App;