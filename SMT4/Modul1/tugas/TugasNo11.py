def apakahKabisat(tahun):
    if tahun%4 == 0:
        if tahun%100 == 0:
            if tahun%400 ==0:
                return True
            else:
                return False
        else:
            return True
    else:
        return False
