import React from "react";
import styles from "./Footer.module.css";

const Footer = () => {
    return (
        <footer className={styles.footer}>
            <div className={styles.footer__div}>
                <p className={styles.footer__p}>
                    &copy; {new Date().getFullYear()} Your Company Name
                </p>
            </div>
        </footer>
    );
    };

export default Footer;