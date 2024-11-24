import React, { useState, useEffect } from "react";

function Catalogue() {
    const [books, setBooks] = useState([]);

    useEffect(() => {
        fetch("http://localhost:5000/api/books")
            .then((res) => res.json())
            .then((data) => setBooks(data))
            .catch((err) => console.error(err));
    }, []);

    return (
        <div>
            <h1>Book Catalogue</h1>
            <ul>
                {books.map((book) => (
                    <li key={book.id}>
                        {book.title} by {book.author} - ${book.price}
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default Catalogue;
