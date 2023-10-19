# from collections import OrderedDict
# see: https://docs.python.org/3.11/library/collections.html?highlight=ordereddict#collections.OrderedDict

# initial cash fund state
cashFund = {
  50000:  1,
  20000:  1,
  10000:  0,
  5000 :  2,
  2000 :  3,
  1000 :  1,
  500  : 10,
  200  : 20,
  100  :  4,
  50   :  2,
  20   : 20,
  10   : 15,
  5    : 23,
  2    : 14,
  1    : 30
}

changeLimits = {
  50000:  1,
  20000:  1,
  10000:  2,
  5000 :  2,
  2000 :  4,
  1000 :  4,
  500  : 10,
  200  : 15,
  100  : 20,
  50   : 20,
  20   : 25,
  10   : 30,
  5    : 30,
  2    : 30,
  1    : 30
}

allFigures = { key: 0 for key in changeLimits.keys() }


# compute the total amount of cash from a dict { figure: amount }
def getTotalCash(figuresCount):
  total = 0
  for figure, amount in figuresCount.items():
    total += figure * amount
  return total


# optimize how to give back change from available figures
def giveBackChange(cashAvaiblable, totalAmount):
  global allFigures
  cashBack = allFigures.copy()

  for figure, amount in cashAvaiblable.items():
    if amount > 0 and figure <= totalAmount:
      figureCount = totalAmount // figure
      if figureCount > amount:
        figureCount = amount
      if figureCount > 0:
        cashBack[figure] += figureCount
        totalAmount      -= figureCount * figure
  return cashBack


# cash register logic
def cashRegister(totalAmount, moneyGiven):
  global cashFund
  moneyAmount = getTotalCash(moneyGiven)
  
  # error if customer did not give enough cash
  if moneyAmount < totalAmount:
    raise Exception("The customer did not provide enough money to cover the payment.")
  
  # how much cash is needed to give back
  totalReturned = moneyAmount - totalAmount
  
  # add customer payment to cash fund
  for figure, amount in moneyGiven.items():
    cashFund[figure] += amount
  cashReturned = giveBackChange(cashFund, totalReturned)
  
  # draw money returned from cash fund
  for figure, amount in cashReturned.items():
    cashFund[figure] -= amount

  changeMachine()

  return cashReturned


# change machine logic
def changeMachine():
  global cashFund
  global changeLimits
  global allFigures

  # compute differences between limits and cash fund weighted by figure values
  diffLimits = allFigures.copy()
  for figure, limit in changeLimits.items():
    diffLimits[figure] = (limit - cashFund[figure]) * figure

  # sort differences
  diffLimits = sorted(
    diffLimits.items(),
    key=lambda item: item[1],
    reverse=True
  )
  # first 5 figures are requested to change machine
  # neededFigures = diffLimits[:5]
  neededFigures = { item[0]: True for item in diffLimits[:5] }
  # last 5 figures are sended to change machine
  sendedFigures = dict(diffLimits[10:])

  # take half of available figures in cash fund (one minimum)
  for figure, amount in sendedFigures.items():
    value =  amount // 2
    sendedFigures[figure] = value if value > 0 else 1
    cashFund[figure] -= sendedFigures[figure]
    # sendedFigures[figure] = amount // 2
    # if sendedFigures[figure] == 0:
    #   sendedFigures[figure] += 1
    # cashFund[figure] -= sendedFigures[figure]
  
  # local copy of change machine limimts
  limits      = changeLimits.copy()
  # total amount passed to cash machine
  moneyAmount = getTotalCash(sendedFigures)
  # dict containing all figures with value 0
  cashBack    = allFigures.copy()


  jobDone     = False
  while moneyAmount > 0 and jobDone is False:
    for figure, amount in neededFigures.items():
      # figure available and lte to amount to give back
      if limits[figure] > 0 and figure <= moneyAmount:
        cashBack[figure] += 1
        limits[figure]   -= 1
        moneyAmount      -= figure
      else:
        jobDone = True
        break

  # unable to give monney back using only requested figures
  if moneyAmount > 0:
    # amount to give back according to change machine limits
    addToCashBack = giveBackChange(limits, moneyAmount)
    for figure, amount in addToCashBack.items():
      cashBack[figure] += amount
  
  # add monney to cash fund
  for figure, amount in cashBack.items():
    cashFund[figure] += amount

  return cashBack


# ---8<--- tests

# à payer: 103€32, payé: 150€, rendu: 46.68
cashReturned_1 = cashRegister(10332, {
  10000: 1,
  5000:  1
})
totalReturned_1 = getTotalCash(cashReturned_1) /100

# à payer: 77€81, payé: 104€, rendu: 26€19
cashReturned_2 = cashRegister(7781, {
  5000: 2,
  200:  1,
  100:  2
})
totalReturned_2 = getTotalCash(cashReturned_2) /100


print('eof')
