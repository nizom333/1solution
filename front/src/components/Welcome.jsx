import React from 'react';

export default function Welcome() {
  return(
    <div className="welcome">
      <div className="onboarding boundless">
        <div className="onboarding__background">
            <img alt="Первый Бит" src="https://1solution.ru/local/templates/nextype_s1/img/services-bg-min.jpg" />
        </div>
        <div className="onboarding__modal">
            <div className="logo-w">
                <a href="https://1solution.ru" target="_blank">
                    <img alt="Первый Бит" src="https://1solution.ru/local/templates/nextype_s1/img/Logo-black.svg" />
                </a>
            </div>
            <div className="log-popup-wrap text-center" id="login-popup-wrap" style={{
                  "text-align": "center",
                  "margin": "0 0 50px"
            }}>
              <h1>Добро пожаловать в Первый Бит !!!</h1>
            </div>
        </div>
    </div>
      
    </div>
  );
}