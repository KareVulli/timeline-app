const createAsyncMutation = (type) => ({
    BASE: `${type}`,
    SUCCESS: `${type}_SUCCESS`,
    FAILURE: `${type}_FAILURE`,
    PENDING: `${type}_PENDING`,
    loadingKey: `${_.camelCase(type)}Pending`,
    statusCode: `${_.camelCase(type)}StatusCode`,
    stateKey: `${_.camelCase(type)}Data`
})
  
export const GET_INFO_ASYNC = createAsyncMutation('GET_INFO_ASYNC')