
import React from "react";
import Navigation from "../Main/Navigation";
import Footer from "../Main/Footer";
import styles from "./Layout.module.css";

const Layout = ({ children }) => {
    return (
        <div className={styles.wrapper}>
            <header>
                <Navigation />
            </header>
            <main className={styles.main}>
                {children}
            </main>
            <Footer />
        </div>
    );
};

export default Layout;