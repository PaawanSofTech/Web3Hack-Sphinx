import React, { useEffect } from "react";
import { Button } from "antd";
import { useThemeSwitcher } from "react-css-theme-switcher";
import Address from "./Address";
import Balance from "./Balance";
import Wallet from "./Wallet";

export default function Account({
  address,
  userSigner,
  localProvider,
  mainnetProvider,
  price,
  minimized,
  web3Modal,
  loadWeb3Modal,
  logoutOfWeb3Modal,
  blockExplorer,
  isContract,
}) {
  const { currentTheme } = useThemeSwitcher();

  useEffect(() => {
    // Check if a web3 provider is cached, and if so, log the user out when the page is refreshed
    const handlePageRefresh = () => {
      if (web3Modal && web3Modal.cachedProvider) {
        logoutOfWeb3Modal();
      }
    };

    // Add an event listener for page refresh
    window.addEventListener("beforeunload", handlePageRefresh);

    // Clean up the event listener when the component is unmounted
    return () => {
      window.removeEventListener("beforeunload", handlePageRefresh);
    };
  }, [web3Modal, logoutOfWeb3Modal]);

  let accountButtonInfo;
  if (web3Modal?.cachedProvider) {
    accountButtonInfo = { name: "Logout", action: logoutOfWeb3Modal };
  } else {
    accountButtonInfo = { name: "Connect", action: loadWeb3Modal };
  }

  const display = !minimized && (
    <span>
      {address && (
        <Address address={address} ensProvider={mainnetProvider} blockExplorer={blockExplorer} fontSize={20} />
      )}
      <Balance address={address} provider={localProvider} price={price} size={20} />
      {!isContract && (
        <Wallet
          address={address}
          provider={localProvider}
          signer={userSigner}
          ensProvider={mainnetProvider}
          price={price}
          color={currentTheme === "light" ? "#1890ff" : "#2caad9"}
          size={22}
          padding={"0px"}
        />
      )}
    </span>
  );

  return (
    <div style={{ display: "flex" }}>
      {display}
      {web3Modal && (
        <Button style={{ marginLeft: 8 }} shape="round" onClick={accountButtonInfo.action}>
          {accountButtonInfo.name}
        </Button>
      )}
    </div>
  );
}
