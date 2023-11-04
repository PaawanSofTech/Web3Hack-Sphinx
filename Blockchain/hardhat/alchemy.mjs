import { Network, Alchemy } from 'alchemy-sdk';

const settings = {
    apiKey: "Y2_eLPRciLA2lzc1Y3KYnHjNOsXTFMil",
    network: Network.ETH_MAINNET,
};

const alchemy = new Alchemy(settings);

// get the latest block
const latestBlock = alchemy.core.getBlock("latest").then(console.log);
